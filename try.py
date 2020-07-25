#!/bin/python3
import os
import sys
import subprocess
import mod
import re
import pyfiglet
def l():
    b.write("\n")
mod.first()
li = "*************************************************************************************************************"
print("\n")
x = input("Enter Your Name =")
try:
    with open("/root/result.txt") as f:
        lines = f.readlines()  # read all lines into a list
        for index, line in enumerate(lines):  # enumerate the list and loop through it
            if re.match(x, line):  # check if the current line has your substring
                #                print(line.rstrip())
                a = index + 18
                b = index + 1
                print("".join(lines[b:a]))
except None:
    print("Bye")
try:
    new = input("Want to enter a new student(Y/n) =")
    if new == "Y" and "y":
        
        mod.second()

        with open("/root/result.txt", "a") as b:
            name = input("Enter the name of student =")
            for index, line in enumerate(lines):  # enumerate the list and loop through it
                if re.match(name, line):
                    print("Entry already exist")
                    exit()
            else:
                try:
                    I = int(input("Enter marks of Islamiyat ="))
                    U = int(input("Enter marks of Urdu ="))
                    E = int(input("Enter marks of English ="))
                    M = int(input("Enter marks of Mathematics ="))
                    P = int(input("Enter marks of Physics ="))
                    PS = int(input("Enter marks of Pakistan Studies ="))
                    C = int(input("Enter marks of Chemistry ="))
                    su = I + U + P + PS + M + E + C
                    b.write("\n")
                    b.write(name)
                    l()
                    b.write(li)
                    l()
                    b.write((pyfiglet.figlet_format(name)))
                    b.write(li)
                    l()
                    b.write("ISLAMIYAT 			")
                    b.write(str(I))
                    l()
                    b.write("Urdu				")
                    b.write(str(U))
                    l()
                    b.write("ENGLISH				")
                    b.write(str(E))
                    l()
                    b.write("MATHEMATICS			")
                    b.write(str(M))
                    l()
                    b.write("PHYSICS				")
                    b.write(str(P))
                #                   print("\n")
                #                   b.write("PHYSICS				")
                #                   b.write(t)
                    l()
                    b.write("PAKISTAN STUDIES	")
                    b.write(str(PS))
                    l()
                    b.write("CHEMISTRY			")
                    b.write(str(C))
                    l()
                    b.write("Total Marks                     ")
                    b.write(str(su))
                    l()
                    b.write(li)
                except ValueError:
                    print("You can enter number only")
    elif new == "N" or "n":
        print("Good Bye!!!")
    else:
        print
except :
    print("Invalid Choice")
