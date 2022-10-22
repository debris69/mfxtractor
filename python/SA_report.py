#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe

import sys
import pandas as pd
from statistics import mean


def sa_analyze(username):
    tweetFile = pd.read_csv('data/'+username+".csv")
    userDataFile = pd.read_csv('data/'+username+"_data.csv")
    df_n = tweetFile[tweetFile['polarity'] < 0]
    df_p = tweetFile[tweetFile['polarity'] >= 0]
    neg_lis = df_n['polarity'].tolist()
    pos_lis = df_p['polarity'].tolist()

    if len(pos_lis) == 0:
        pos_lis.append(0)

    if len(neg_lis) == 0:
        neg_lis.append(0)

    userDataFile['average positive polarity'] = mean(pos_lis)
    userDataFile['average negative polarity'] = mean(neg_lis)

    df_n = tweetFile[tweetFile['polarity'] < 0]
    df_p = tweetFile[tweetFile['polarity'] > 0]
    df_neutral = tweetFile[tweetFile['polarity'] == 0]

    total = len(tweetFile.index)

    userDataFile['% of positive tweets'] = (len(df_p.index)/total)*100
    userDataFile['% of negative tweets'] = (len(df_n.index)/total)*100
    userDataFile['% of neutral tweets'] = (len(df_neutral.index)/total)*100

    userDataFile.to_csv('data/'+username+"_data.csv")


if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]

    print("generating sa report<br/>")
    sa_analyze(username)
