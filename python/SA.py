#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe

from textblob import TextBlob
import pandas as pd
import sys


def run_sa(username):
    tweetFile = pd.read_csv('data/'+username+".csv")
    tweets = tweetFile['clean_tweet'].tolist()
    tweetFile['polarity'] = [
        TextBlob(str(x)).sentiment.polarity for x in tweets]
    tweetFile['subjectivity'] = [
        TextBlob(str(x)).sentiment.subjectivity for x in tweets]
    tweetFile.to_csv('data/'+username+".csv")


if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]

    print("running sentiment ananlysis<br/>")
    run_sa(username)
