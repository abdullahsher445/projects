'''
Teachers in most school districts are paid on a schedule that provides a salary based on
their number of years of teaching experience. For example, a beginning teacher in the
Manningham School District might be paid $50,000 the first year. For each year of
experience after this first year, up to 10 years, the teacher receives a 3% increase over
the preceding year.
Write a program that displays a salary schedule, in tabular format, for teachers in a
school district. The inputs are the starting salary, the percentage increase, and the
number of years in the schedule. Each row in the schedule should contain the year
number and the salary for that year
'''


def lineSeparator():  # function is created so that lines could be easily drawn in the table
    print("_" * 60)


# input required from the user
startingSalary = int(input("Enter starting salary = "))
PercentageIncrease = float(input("Enter the percentage increase = "))
years = int(input("Enter number of years = "))
lineSeparator()  # calling function to draw the line
# header of the Table
print("%6s%16s%12s%16s" % ("Year", "StartingSalary", " Increase", " EndingSalary"))
lineSeparator()
endingSalary = startingSalary
# loop to insert data rows into the table
for year in range(1, years + 1):
    interest = float(endingSalary * (PercentageIncrease / 100))
    endingSalary = float(endingSalary + interest)

    # An if condition to check wether the number of years is greater than 10 or not
    # if number of years is greater than 10 then the program will stop after 10 years,display
    # the following message and then loop will break
    if year > 10:
        print("The increase was applicable only upto 10 years ")
        break
    # row for printing data into table
    print("%6s%16.2f%12.2f%16.2f" % (year, float(endingSalary), interest, endingSalary))
    lineSeparator()
