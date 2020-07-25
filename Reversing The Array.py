from array import *

# reverse the array
a = int(input('How many numbers you wana enter ='))
arr = array("i", [])
for c in range(a):
    d = int(input("Enter Number ="))
    arr.append(d)
print
print("The array to be reversed is =",arr.tolist())
for b in range(len(arr) - 1, -1, -1):
    arr.append(arr[b])
    arr.pop(b)
print("Reversed Array =",arr.tolist())
