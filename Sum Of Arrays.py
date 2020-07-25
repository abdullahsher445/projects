from numpy import *



inp = int(input("How many numbers You want to enter ="))
arr1 = array([],int)
arr2 = array([],int)
arr3 = array([],int)

for i in range(inp):
    a =int(input("Enter Number ="))
    arr1 = append(arr1,a)
print("Array 1 = ",arr1)
print("++++++++"*3)
for i in range(inp):
    a = int(input("Enter Number ="))
    arr2 = append(arr2,a)
print("Array 2 = ",arr2)
for i in range(inp):
    a = 0
    arr3 = append(arr3,a)
print("++++++"*10)
print("Array 1 =",arr1, "   +  ","Array 2 =", arr2)
print("++++++"*10)
for i in range(inp):
    arr3[i] = arr1[i] + arr2[i]
print("The sum of Arrays is =",arr3)