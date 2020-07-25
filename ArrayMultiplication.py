from numpy import *


print("""
 Format for matrix A
      [0,0,0,0]
      [0,0,0,0]
 Each value you will enter will be replaced by a zero in order
""")
x= []
y= []
for g in range(6):
    z = int(input("Enter the number ="))
    x.append(z)
print("""
 Format for Matrix B   
     [0,0]
     [0,0]
     [0,0]
 Each value you will enter will be replaced by a zero in order
""")
for g in range(6):
    z = int(input("Enter the number ="))
    y.append(z)
print(y)
a = array([
    [x[0], x[1], x[2]],
    [x[3], x[4], x[5]]
], int)
b = array([
    [y[0], y[1]],
    [y[2], y[3]],
    [y[4], y[5]]
],int)
c=array([
    zeros(2,int),
    zeros(2,int)

])
print("*"*50)
print("Matrix A x Matrix B")
print("*"*50)

d=0
f=0
for z in range(2):
 for v in range(2):
    d=0
    for i in range(3):
        f =a[z, i]*b[i, v]
        d=d+f
#        print(f) useful to check working
    q=d
#    print(q)
    c[z,v] = q
#   print("*"*4)
print("Result of multiplication")
print(c)