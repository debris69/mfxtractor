#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe

import pandas as pd
import sys
import csv


# 9. Personality Trait
def get_personality_trait(username):
    tweetFile = pd.read_csv('data/'+username+".csv")
    userDataFile = pd.read_csv('data/'+username+"_data.csv")

    neutral_post = len((tweetFile[tweetFile['polarity'] == 0]).index)
    negative_post = len((tweetFile[tweetFile['polarity'] < 0]).index)
    positive_post = len((tweetFile[tweetFile['polarity'] > 0]).index)
    total = len(tweetFile.index)

    userDataFile['pessimist'] = 'Yes' if (negative_post /
                                          (1 if positive_post == 0 else positive_post)) > 1 else 'No'
    userDataFile['aggreable'] = 'Yes' if (max(
        [neutral_post, negative_post, positive_post]) / total) > 1 else 'No'
    userDataFile['spectator'] = 'Yes' if ((
        (neutral_post)/(1 if (positive_post + negative_post) == 0 else (positive_post + negative_post)))) > 1 else 'No'
    userDataFile['active and social'] = 'Yes' if ((
        positive_post + negative_post)/(1 if neutral_post == 0 else neutral_post)) > 1 else 'No'
    userDataFile['optimist'] = 'Yes' if ((
        positive_post/(1 if negative_post == 0 else negative_post))) > 1 else 'No'

    userDataFile.to_csv('data/'+username+"_data.csv")


# run tests

if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]

    print("extracting personality trait scores<br/>")
    get_personality_trait(username)

    with open('data/'+username+'_data.txt', "w") as my_output_file:
        with open('data/'+username+'_data.csv', "r") as my_input_file:
            [my_output_file.write(" ".join(row)+'\n')
             for row in csv.reader(my_input_file)]
        my_output_file.close()
