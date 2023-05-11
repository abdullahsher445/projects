'''
Write a program that prompts the user for an input number and checks to see if that
input number is greater than zero. If the input number is greater than 0, the program
does a multiplication of all the numbers up to the input number starting with the input
number. For example if the user inputs the number 9, then the program displays the
following sum:
9 * 8 * 7 * 6 * 5 * 4 * 3 * 2 * 1 = 362880
If the user input number is less than or equal to 0, an appropriate error message is
produced and the program ends
'''
num = int(input("Enter any number ="))
if num > 0:
    i = 1  # i is used as counter
    product = 1  # product should be 1 because if it is 0 the output will become zero due to multiplication
    while i <= num:
        print(i, "x ", end='')
        product *= i  # same as product = product x i
        i += 1
    print("\b\b = ", product)
    # \b is used to remove the last x that will be printed after the last number if \b is not used
    # the output will be 1x2x3x4x = so to avoid that \b will remove last x
else:
    # if number is smaller than zero
    print("Enter a number greater than zero")
