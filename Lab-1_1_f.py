'''
f)	Write a program that converts hours to its equivalent in minutes first then to
seconds and prints the results on the screen.  The program should request a number
 representing the hours and converts it into minutes then seconds.  Make sure to use
 the following constants in your program, for example

       	MINUTES_PER_HOUR =  60 ;
	SECONDS _PER_ MINUTE =  60 ;
'''
hours = int(input("Enter the number of hours = "))  # taking input from user as integer
MINUTES_PER_HOUR = 60  # constants are written upper case
SECONDS_PER_MINUTE = 60  # constants are written upper case
result_min = hours * MINUTES_PER_HOUR
result_sec = result_min * SECONDS_PER_MINUTE
# printing the output
print("There are ", result_min, " minutes in ", hours, " hours")
print("There are ", result_sec, " seconds in ", hours, " hours")
