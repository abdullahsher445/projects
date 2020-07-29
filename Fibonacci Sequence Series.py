#With Function
x = int(input("Enter number upto which you want top get Fibonacci Sequence series ="))
a = 0
b = 1
c = 0
print("*" * 10, "( Fibonacci Sequence Series )", "*" * 10)# only to make output attractive
for i in range(x + 1):  # +1 is optional and is used here so that when we specify maximum value as 2 it will print both of the ones
    if c > x:  # if value of c will be greater than your specified number the loop will be ended
        break
    else:
        print(c)
        c = a + b
        a = b
        b = c
        c = a # it is optional
(------------------------------------------------------------------------------------------------------------------------------------------------------------------)

#With Function
x = int(input("Enter number upto which you want top get Fibonacci Sequence series ="))
def fn(a):
    a = 0
    b = 1
    c = 0
    print("*" * 10, "( Fibonacci Sequence Series )", "*" * 10) # only to make output attractive
    for i in range(x + 1):  # +1 is optional and is used here so that when we specify maximum value as 2 it will print both of the ones
        if c > x:  # if value of c will be greater than your specified number the loop will be ended
            break
        else:
            print(c)
            c = a + b
            a = b
            b = c
            c = a # it is optional
fn(x)
