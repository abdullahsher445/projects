list = []
greaterthandigitx = 0
equaltodigitx = 0
lessthanx = 0
print("This program will compare the length of your enteries with your specified number of characters")
digit = int(input("Enter number of charcters to be compared = "))
listofgreater = []
listofequal = []
listofless = []


x = int(input("How many entries you want to do = "))
for i in range (x):
       d = input("Entry no {} = ".format(i+1))
       list.append(d)

for i in range(x):
    if int(len(list[i])) > digit:
        greaterthandigitx += 1
        listofgreater.append(list[i])
    elif int(len(list[i])) == digit:
        equaltodigitx += 1
        listofequal.append(list[i])
    elif int(len(list[i])) < digit:
        lessthanx += 1
        listofless.append(list[i])
print("Enteries having greater than",digit,"characters = " ,greaterthandigitx, "Enteries")
print("List of Enteries having greater than",digit,"characters =",listofgreater)
print("Enteries having equal to",digit,"characters = ",equaltodigitx, "Enteries")
print("List of Enteries having equal to",digit,"characters =",listofequal)
print("Enteries having less than",digit,"characters = ",lessthanx, "Enteries")
print("List of Enteries having less than",digit,"characters =",listofless)
