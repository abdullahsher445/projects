from array import *
import sys


#remove an element of array
arr = array("i",[])
x =int(input("How many numbers You want to enter ="))
for i in range(x):
    a = int(input("Enter The Value = "))
    arr.append(a)
print(arr)
sel = input('Remove number directly aur via index( "n" to delete directly and "i" to remove by index) =')


if sel=="n":
    remove = int(input("Which number you wana remove from the array ="))
    for c in range (x):
      if arr[c]==remove:
        del arr[c]
        break
      else:
        pass
    print(arr)
elif sel=="i":
    opt = input("Would like to see the index of all enteries(Y/N) =")
    if opt== "Y":
        for b in range(x):
            print("Index of",arr[b],"is = ",b)
        y = int(input("Enter index of the number you wana remove = "))
        arr.pop(y)
        print(arr)
    elif opt=="N":
        print(arr)
        y = int(input("Enter index of the number you wana remove = "))
        arr.pop(y)
        print(arr)
    else:
        print("Error")
        sys.exit()