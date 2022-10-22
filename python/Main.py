#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe


import sys
import os
import twint
import nest_asyncio


nest_asyncio.apply()


# 1. Lookup User


def user_lookup(username):
    c = twint.Config()
    c.Username = username
    c.Store_csv = True
    c.Profile_full = True
    c.Hide_output = True
    c.Output = 'data/'+username+"_data.csv"
    twint.run.Lookup(c)

# 2. Get Tweets


def get_user_tweet(username, tweetCount):
    c = twint.Config()
    c.Username = username
    c.Store_csv = True
    c.Limit = tweetCount
    c.Profile_full = True
    c.Hide_output = True
    c.Lang = 'en'
    c.Output = 'data/'+username+".csv"
    twint.run.Search(c)


# run tests
if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]
    
    if os.path.exists('data/'+username+'.csv'):
        for root, dirs, files in os.walk('data'):
            for file in files:
                os.remove(os.path.join(root, file))

    print("initiating lookup<br/>")
    user_lookup(username)
    print("extracting "+str(tweetcount)+" tweets<br/>")
    get_user_tweet(username, tweetcount)
