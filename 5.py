def pecahkata(kata):
    print([kata[i:i+3] for i in range(0, len(kata), 3)])
    print([kata[i:i+4] for i in range(0, len(kata), 3)])
    print([kata[i:i+5] for i in range(0, len(kata), 3)])
    
    
x = input("Masukkan Kata :")
pecahkata(x)
