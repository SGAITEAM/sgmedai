from flask import Flask, request, jsonify
import cv2
import json
import tensorflow as tf
from tensorflow import keras
import numpy as np
import joblib
from joblib import Memory

app = Flask(__name__)

def load_model_dr():
    return tf.saved_model.load('dr_model')

def load_model_skin():
    return tf.saved_model.load('skin_model')

memory = joblib.Memory(location='models_cache_dir')

cached_load_model_dr = memory.cache(load_model_dr)
cached_load_model_skin = memory.cache(load_model_skin)

model_dr = cached_load_model_dr()
model_skin = cached_load_model_skin()

@app.route('/predict-dr', methods=['POST'])
def predicDr():
    # Giriş görüntüsünü yükleyin
    img_path = request.form['input_data']
    img = tf.keras.preprocessing.image.load_img(img_path, target_size=(600, 600))
    img_array = tf.keras.preprocessing.image.img_to_array(img)
    img_array = tf.expand_dims(img_array, axis=0)
    img_array = tf.image.convert_image_dtype(img_array, tf.float32)
    # Modeli yükleyin
    infer = model_dr.signatures['serving_default']
    # Tahmin yapın
    result = infer(input_layer=img_array)
    output_layer = result['activation']
    # print(output_layer)
    return json.dumps(output_layer.numpy().tolist()) 

@app.route('/predict-skin', methods=['POST'])
def predictSkin():
    # Giriş görüntüsünü yükleyin
    img_path = request.form['input_data']
    img = tf.keras.preprocessing.image.load_img(img_path, target_size=(600, 600))
    img_array = tf.keras.preprocessing.image.img_to_array(img)
    img_array = tf.expand_dims(img_array, axis=0)
    img_array = tf.image.convert_image_dtype(img_array, tf.float32)
    # Modeli yükleyin
    infer = model_skin.signatures['serving_default']
    # Tahmin yapın
    result = infer(input_layer=img_array)
    output_layer = result['activation']
    # print(output_layer)
    return json.dumps(output_layer.numpy().tolist()) 

if __name__ == '__main__':
    app.run(debug=True)















# app = flask.Flask(__name__)
# app.config["DEBUG"] = False


# @app.route('/', methods=['GET'])
# def home():
#     return "<h1>dev.to/koraybarkin Flask ile Web API geliştirme</h1><p>Tebrikler ilk Web API'ınızı başarıyla geliştirdiniz!</p>"

# app.run()