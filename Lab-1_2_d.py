'''
Write a program that reads an integer value and prints the sum of all even integers
between 2 and the input value, inclusive. Print an error message if the input value is less
than 2. Prompt accordingly.
'''

global number  # making the variable named "number" global so that it can be accessed with in the function
number = int(input("Enter the number  = "))  # The user enters a number
if (number % 2 == 0):  # to ensure that if a user enters an even number that number should also be included
    number += 1
else:
    number = number


def even_sum(number):
    i = 2;  # as satrting point is given in the question of which is 2 and using it as a counter
    sum = 0  # initially the sum is zero
    while (i < number):  # to get a range of numbers between 2 and given number
        sum = sum + i  # Adding the even numbers to sum
        i += 2  # incrementing i by 2
    return sum;

if (number > 2):
    print(even_sum(number))  # calling the function
else:
    print("Enter Number greater than 2")
