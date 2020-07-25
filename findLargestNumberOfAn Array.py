
from numpy import *
#Find Largest number from an array

#----------------------------------------------------------------------------------------------------------------------------------------------------
#Method No 1
#----------------------------------------------------------------------------------------------------------------------------------------------------
a=array([],int)
inp =int(input("How many numbers you want to enter ="))
for i in range(inp):
    num = int(input("Enter Number ="))
    a = append(a,num)
p=a[0]
for e in a:
    if e>=p:
        p=e
print("The largest Number is =",p)
#----------------------------------------------------------------------------------------------------------------------------------------------------
#Method No 2
#----------------------------------------------------------------------------------------------------------------------------------------------------

inp =int(input("How many numbers you want to enter ="))
a = array([],int)
for i in range(inp):
    num = int(input("Enter Number ="))
    a = append(a,num)
a.sort()
print("The largest Number is =", a[-1])
