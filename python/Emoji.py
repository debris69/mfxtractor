#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe

import sys
import pandas as pd
import advertools as adv


def get_emoticons_data(username):
    tweetFile = pd.read_csv('data/'+username+".csv")
    userDataFile = pd.read_csv('data/'+username+"_data.csv")
    st = []
    for i, row in tweetFile.iterrows():
        st.append(str(row['tweet']))
    emo_dict = adv.extract_emoji(st)
    userDataFile['total tweets'] = emo_dict['overview']['num_posts']
    userDataFile['total emojis'] = emo_dict['overview']['num_emoji']
    userDataFile['emoji per post'] = emo_dict['overview']['emoji_per_post']
    userDataFile['unique emojis'] = emo_dict['overview']['unique_emoji']
    userDataFile['most used emojis'] = max(
        emo_dict['top_emoji_text'], key=lambda item: item[1])[0]
    userDataFile['emojis and frequency'] = str(
        emo_dict['top_emoji_text']).strip('[]')
    userDataFile['emoji sub-group'] = str(
        emo_dict['top_emoji_sub_groups']).strip('[]')
    userDataFile.to_csv('data/'+username+"_data.csv")


if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]

    print("building emoticons dictionary<br/>")
    get_emoticons_data(username)
