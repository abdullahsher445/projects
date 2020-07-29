a = 20#replace both a and c with number of which you wanna find the factorial
c =20
for i in range(1,a):
       c = i*c
print(c)
#--------------------------------------------------------------------------------------
x = int(input("Of which number you want to find the factorial = "))
c = x
for i in range(1,x):
       c = i*c
print(c)
#--------------------------------------------------------------------------------------
#using Recursion
#--------------------------------------------------------------------------------------
print("*"*50)#for
print("------Factorial Finder-----")
print("*"*50)
enter = int(input("Of which number you want to find the factorial = "))
i = 1
global d
d =1
def fact(x):
    global i, d
    c = d * i
    i +=  1
    d = c
    if i < x+1:
           fact(enter)
    else:
           return d
           exit()
fact(enter)
print("The factorial of",enter,"is = ",d)