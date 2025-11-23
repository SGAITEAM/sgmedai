import tensorflow as tf
from tensorflow import keras

saved_model_dir = "skin_model"

# 1) Load SavedModel
loaded = tf.saved_model.load(saved_model_dir)
infer = loaded.signatures["serving_default"]

print("Signature inputs:", infer.structured_input_signature)
print("Signature outputs:", infer.structured_outputs)

# 2) Extract input layer info
input_spec = list(infer.structured_input_signature[1].values())[0]
input_shape = input_spec.shape
input_dtype = input_spec.dtype

inputs = keras.Input(shape=input_shape[1:], dtype=input_dtype, name=list(infer.structured_input_signature[1].keys())[0])

# 3) Call TF concrete function using keyword argument
outputs = infer(**{inputs.name: inputs})

# 4) Wrap into keras Model
model = keras.Model(inputs=inputs, outputs=outputs)

# 5) Save as .keras (Keras 3 friendly)
model.save("skin_model.keras")
print("✓ Kaydedildi: skin_model.keras")
