from Crypto.Cipher import PKCS1_OAEP
from Crypto.PublicKey import RSA

# 读取图片文件
with open('pic_original.bmp', 'rb') as f:
    img = f.read()
# 提取图片头部数据
img_header = img[:54]
img_data = img[54:]
img_data_len = len(img_data)
# 对0x00进行转换，防止与RSA填充冲突
img_data = img_data.replace(b'\x00', b'\x01')
# 将位图数据分组，存放于列表img_data_blocks中
block_len = 64
img_data_blocks = []
for i in range(int(img_data_len/block_len)):
    img_data_blocks.append(img_data[i*block_len:(i+1)*block_len])

# 教科书RSA加密
# 在这里添加代码，生成1024bit的RSA密钥对象，用于RSA教科书加解密，保存于key中

# 逐分组加密
encrypted_img_data_blocks_1 = []
encrypted_img_data_blocks_2 = []
for block in img_data_blocks:
    # 在这里添加代码，使用密钥key的相关方法，对图片文件的分组数据block进行两次RSA教科书加密
    # 结果分别保存于data1,data2中


    # 将加密后的分组保存至新列表中
    encrypted_img_data_blocks_1.append(data1)
    encrypted_img_data_blocks_2.append(data2)
# 与头部数据拼接
encrypted_img_1 = img_header
encrypted_img_2 = img_header
for block in encrypted_img_data_blocks_1:
    encrypted_img_1 += block
for block in encrypted_img_data_blocks_2:
    encrypted_img_2 += block
# 图片保存
with open('RSA-textbook_1.bmp', 'wb') as f:
    f.write(encrypted_img_1)
with open('RSA-textbook_2.bmp', 'wb') as f:
    f.write(encrypted_img_2)
print('RSA textbook encrypted images have been saved in \'RSA-textbook_1.bmp\' and \'RSA-textbook_2.bmp\'')

# 教科书RSA解密
# 逐分组解密
decrypted_img_data_blocks_1 = []
decrypted_img_data_blocks_2 = []
for block in encrypted_img_data_blocks_1:
    # 在这里添加代码，使用密钥key的相关方法，对加密文件的分组数据block进行RSA教科书解密
    # 结果保存于data1中

    # 将解密后的分组保存至新列表中
    decrypted_img_data_blocks_1.append(data1)
for block in encrypted_img_data_blocks_2:
    # 在这里添加代码，使用密钥key的相关方法，对加密文件的分组数据block进行RSA教科书解密
    # 结果保存于data2中

    # 将解密后的分组保存至新列表中
    decrypted_img_data_blocks_2.append(data2)
# 与头部数据拼接
decrypted_img_1 = img_header
decrypted_img_2 = img_header
for block in decrypted_img_data_blocks_1:
    decrypted_img_1 += block
for block in decrypted_img_data_blocks_2:
    decrypted_img_2 += block
# 图片保存
with open('decrypted-textbook_1.bmp', 'wb') as f:
    f.write(decrypted_img_1)
with open('decrypted-textbook_2.bmp', 'wb') as f:
    f.write(decrypted_img_2)
print('Decrypted RSA textbook images have been saved in \'decrypted-textbook_1.bmp\' and \'decrypted-textbook_2.bmp\'')

# RSA-OAEP加密
# 在这里添加代码，首先按照之前的方法重新生成1024bit密钥key
# 然后使用key生成支持PKCS#1 OAEP加解密的RSA加解密机，保存于cipher中

# 逐分组加密
encrypted_img_data_blocks_1 = []
encrypted_img_data_blocks_2 = []
for block in img_data_blocks:
    # 在这里添加代码，使用cipher的相关方法，对图片文件的分组数据block进行两次RSA-OAEP加密
    # 分别保存于data1,data2中


    # 将加密后的分组保存至新列表中
    encrypted_img_data_blocks_1.append(data1)
    encrypted_img_data_blocks_2.append(data2)
# 与头部数据拼接
encrypted_img_1 = img_header
encrypted_img_2 = img_header
for block in encrypted_img_data_blocks_1:
    encrypted_img_1 += block
for block in encrypted_img_data_blocks_2:
    encrypted_img_2 += block
# 图片保存
with open('RSA-OAEP_1.bmp', 'wb') as f:
    f.write(encrypted_img_1)
with open('RSA-OAEP_2.bmp', 'wb') as f:
    f.write(encrypted_img_2)
print('RSA OAEP encrypted images have been saved in \'RSA-OAEP_1.bmp\' and \'RSA-OAEP_2.bmp\'')

# 逐分组解密
decrypted_img_data_blocks_1 = []
decrypted_img_data_blocks_2 = []
for block in encrypted_img_data_blocks_1:
    # 在这里添加代码，使用cipher的相关方法，对加密文件的分组数据block进行RSA-OAEP解密
    # 保存于data1中

    # 将解密后的分组保存至新列表中
    decrypted_img_data_blocks_1.append(data1)
for block in encrypted_img_data_blocks_2:
    # 在这里添加代码，使用cipher的相关方法，对加密文件的分组数据block进行RSA-OAEP解密
    # 保存于data2中

    # 将解密后的分组保存至新列表中
    decrypted_img_data_blocks_2.append(data2)
# 与头部数据拼接
decrypted_img_1 = img_header
decrypted_img_2 = img_header
for block in decrypted_img_data_blocks_1:
    decrypted_img_1 += block
for block in decrypted_img_data_blocks_2:
    decrypted_img_2 += block
# 图片保存
with open('decrypted-OAEP_1.bmp', 'wb') as f:
    f.write(decrypted_img_1)
with open('decrypted-OAEP_2.bmp', 'wb') as f:
    f.write(decrypted_img_2)
print('Decrypted RSA OAEP images have been saved in \'decrypted-OAEP_1.bmp\' and \'decrypted-OAEP_2.bmp\'')

