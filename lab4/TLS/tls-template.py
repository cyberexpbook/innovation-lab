#!/usr/bin/env python
# -*- coding: utf-8 -*-

from __future__ import with_statement
from __future__ import print_function
try:
    from scapy_ssl_tls.ssl_tls import *
except ImportError:
    from scapy.layers.ssl_tls import *
from Cryptodome.PublicKey import RSA
from Cryptodome.Cipher import PKCS1_v1_5
from Cryptodome import Random


tls_version = TLSVersion.TLS_1_2
ciphers = [TLSCipherSuite.RSA_WITH_AES_256_CBC_SHA]
extensions = [TLSExtension() / TLSExtECPointsFormat(),
              TLSExtension() / TLSExtSupportedGroups(),
              TLSExtension() / TLSExtSignatureAlgorithms()]

# 设置一个TLS客户端
ip = 
port = 
server = (ip, port)
with TLSSocket(client=True) as tls_socket:
    try:
        tls_socket.connect(server)
        print("Connected to server: %s" % (server,))
    except socket.timeout:
        print("Failed to open connection to server: %s" % (server,), file=sys.stderr)
    else:
        try:
            server_hello, server_kex = tls_socket.do_handshake(tls_version, ciphers, extensions)
            # server_hello.show()
        except TLSProtocolError as tpe:
            print("Got TLS error: %s" % tpe, file=sys.stderr)
            tpe.response.show()
        else:
            resp = tls_socket.do_round_trip(TLSPlaintext(data="GET / HTTP/1.1\r\nHOST: localhost\r\n\r\n"))
            print("Got response from server")
            # resp.show()
# print(tls_socket.tls_ctx)

print('Start decrypt')
# 从TLSSessionCtx中获取加密预主密钥和预主密钥
encrypted_premaster_secret = 
premaster_secret = 
# 加载私钥
passphrase = 
key = 
# 解密
sentinel = Random.get_random_bytes(16)
dec = 
print('The encrypted premaster secret:')
print(''.join(r'\x%02x'% ord(c) for c in encrypted_premaster_secret))
print('The premaster secret :')
print(''.join(r'\x%02x'% ord(c) for c in premaster_secret))
print('The decrypted result :')
print(''.join(r'\x%02x'% ord(c) for c in dec))
if dec == premaster_secret:
    print('Decrypt successfully!')

