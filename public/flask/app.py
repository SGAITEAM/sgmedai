from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np
import os
from joblib import Memory

app = Flask(__name__)

# 🔹 Model klasörleri
DR_MODEL_PATH = os.path.join(os.getcwd(), 'dr_model')
SKIN_MODEL_PATH = os.path.join(os.getcwd(), 'skin_model')

# 🔹 Cache ayarı (RAM’de bir kez yüklenir)
memory = Memory(location='models_cache_dir', verbose=0)

@memory.cache
def load_dr_model():
    print("🔁 DR modeli yükleniyor...")
    return tf.saved_model.load(DR_MODEL_PATH)

@memory.cache
def load_skin_model():
    print("🔁 Skin modeli yükleniyor...")
    return tf.saved_model.load(SKIN_MODEL_PATH)

# 🔹 Modelleri yükle
model_dr = load_dr_model()
model_skin = load_skin_model()

# ---------------------------------------------------------------------
def prepare_image(img_path):
    """Görseli yükle ve modele uygun hale getir."""
    img = tf.keras.preprocessing.image.load_img(img_path, target_size=(600, 600))
    img_array = tf.keras.preprocessing.image.img_to_array(img)
    img_array = tf.expand_dims(img_array, axis=0)
    img_array = tf.image.convert_image_dtype(img_array, tf.float32)
    return img_array

def run_inference(model, img_array):
    """Modelden tahmin al, çıktıyı normalize et."""
    infer = model.signatures['serving_default']
    result = infer(input_layer=img_array)
    # Çıkışı al (ilk tensör)
    output = list(result.values())[0].numpy().flatten()
    # NaN varsa temizle
    output = np.nan_to_num(output)
    # Normalize et
    if np.sum(output) > 0:
        output = output / np.sum(output)
    # JSON-friendly formata çevir
    preds = {str(i): float(v) for i, v in enumerate(output)}
    return preds

# ---------------------------------------------------------------------
@app.route('/predict-dr', methods=['POST'])
def predict_dr():
    """DR modeli ile tahmin"""
    try:
        img_path = request.form.get('input_data')
        if not img_path or not os.path.exists(img_path):
            return jsonify({"error": "Geçersiz görsel yolu"}), 400

        img_array = prepare_image(img_path)
        preds = run_inference(model_dr, img_array)
        return jsonify([img_path, preds])

    except Exception as e:
        print("❌ DR Hata:", str(e))
        return jsonify({"error": str(e)}), 500

# ---------------------------------------------------------------------
@app.route('/predict-skin', methods=['POST'])
def predict_skin():
    """Cilt modeli ile tahmin"""
    try:
        img_path = request.form.get('input_data')
        if not img_path or not os.path.exists(img_path):
            return jsonify({"error": "Geçersiz görsel yolu"}), 400

        img_array = prepare_image(img_path)
        preds = run_inference(model_skin, img_array)
        return jsonify([img_path, preds])

    except Exception as e:
        print("❌ Skin Hata:", str(e))
        return jsonify({"error": str(e)}), 500

# ---------------------------------------------------------------------
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
