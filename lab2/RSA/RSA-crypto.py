from Crypto.Util import number


# 加入代码，生成p和q（长度为10比特）
# 打印p和q的值
print("The p value is: %d" %p)
print("The q value is: %d" %q)

# 加入代码，生成公钥对(e,n)以及私钥对(d,n)
# 打印公私钥对
print("The public key (e, n) is: (%d, %d)" %(e,n))
print("The private key (d, n) is: (%d, %d)" %(d,n))

# 请用个人用户名替换XXX
message = "Hello World! From XXX"
print("The message is "+message)

# 依次打印单个字符的ASCII值
message_ord = [ord(char) for char in message]
print("Each char's ASCII value is")
print(message_ord)

# 加入代码，将单个字符的ASCII值（十进制整数）作为明文，逐字符加密，并存入cipher列表

# 依次打印单个字符被加密后的密文（十进制整数）
print("Each char is encrypted as")
print(cipher)
    
# 加入代码，逐字符解密，并存入plain列表

# 依次打印单个密文字符被解密后的明文（十进制整数）
print("Each encrypted char is decrypted as")
print(plain)

# 将被解密的明文（十进制整数）转为字符，打印解密信息
plain_chr = [chr(i) for i in plain]
decrypted_message = "".join(plain_chr)
print("The decrypted message is "+decrypted_message)