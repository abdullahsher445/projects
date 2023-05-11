from random import *
articleFile = open("articles.txt","r")
nounFile = open("nouns.txt","r")
verbFile = open("verbs.txt","r")
prepositionFile = open("prepositions.txt","r")
global articles
articles = []
nouns = []
prepositions = []
verbs = []

for line in articleFile:
    data = line.split()
    line = line.strip('\n')
    articles.extend(data)
for line in nounFile:
    data = line.split()
    line = line.strip('\n')
    nouns.extend(data)
for line in prepositionFile:
    data = line.split()
    line = line.strip('\n')
    prepositions.extend(data)
for line in verbFile:
    data = line.split()
    line = line.rstrip('\n')
    verbs.extend(data)
def main():
    numberOfSentences = int(input("How many sentences you want to generate = "))
    for i in range (numberOfSentences):
        print(sentences())

def sentences ():
    return nounPhrase() + " " + verbalPhrase()
def nounPhrase():
    return choice(articles) + " " + choice(nouns)
def prepositionalPhrase():
    return choice(prepositions) + " " +  nounPhrase()
def verbalPhrase():
    return choice(verbs) + " " + nounPhrase() + " " + prepositionalPhrase()
main()
articleFile.close()
nounFile.close()
verbFile.close()
prepositionFile.close()