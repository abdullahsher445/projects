print("""   1234
            234
            34
            4 """)
#**************************************************
#Method 1
#**************************************************

print("*"*50)
print("By method 2")
print("*" * 50)

for x in range(1,5):
 a=1
 for i in range(x,5):
    print(i,end="")
 a+=1
 print()

#**************************************************
#Method 2
#**************************************************
print("*"*50)
print("By method 2")
print("*" * 50)

a = "1234"
for x in range(0,4):
 for i in range (x,4):
    print(a[i],end="")
 print()

