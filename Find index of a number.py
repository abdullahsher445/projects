from array import *
import sys
from array import *
# to add two arrays without function




#find index of a number
from array import *
n = int(input("How many numbers You want to enter ="))
arr = array("i",[])
for x in range (n):
    b = int(input("Enter Value = "))
    arr.append(b)
n = n-1
print(arr)
for a in range (n):
    print(arr[n])
index = int(input("Enter the number of which you wana find index ="))
for c in range(n):
    if arr[c]==index:
        print(c)
    else:
        pass