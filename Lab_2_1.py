import os
path = os.getcwd()#getting my current working directory and storing the path in a variable
availableFiles = os.listdir(path) #using the path to get a list of all files available there
def lineSeparator():  # function is created so that lines could be easily drawn in the table
    print("_" * 60)
print("Available files are :")
i=1 #used as a counter to display index with the file names
for name in availableFiles:#going through the list of available files
    if ".txt" in name:#this condition insures that only the files having .txt extension should be displayed
        print(i, ': ', name)
        i+=1
fileName = input("\nEnter the name of file you want to open = ")
file = open(fileName+".txt", "r")#concatenating the name with extension so user dont have to put the extension
print("\n")
#data = file.read()
lineSeparator()

print("%16s%14s%10s" % ("LastName", "No of Hours" , "Wage"))
lineSeparator()
for line in file:
    data = line.split()#split each line of file into a list which has name,wage and hoursfile
    print("%16s%14s%10s" % (data[0],data[1].center(7),data[2]))
    lineSeparator()

file.close()
