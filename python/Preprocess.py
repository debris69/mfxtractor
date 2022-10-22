#!C:/Users/Debris/AppData/Local/Programs/Python/Python38/python.exe

import pandas as pd
import sys
import re
import nltk
nltk.download('stopwords')
nltk.download('punkt')
import preprocess_kgptalkie as ps
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords



def listToString(s):
    str1 = " "
    return (str1.join(s))


# 3. Clean Text


def clean_text(x):
    x = str(x).lower().replace('\\', '').replace('_', ' ')
    x = ps.cont_exp(x)
    x = ps.remove_emails(x)
    x = ps.remove_urls(x)
    x = ps.remove_html_tags(x)
    x = ps.remove_rt(x)
    x = ps.remove_accented_chars(x)
    x = ps.remove_special_chars(x)
    x = re.sub("(.)\\1{2,}", "\\1", x)
    return x


# 4. Filter Stopwords


def filter_stop_words(s):
    stop_words = set(stopwords.words('english'))
    word_tokens = word_tokenize(s)
    filtered_sentence = [w for w in word_tokens if not w.lower() in stop_words]
    filtered_sentence = []
    for w in word_tokens:
        if w not in stop_words:
            filtered_sentence.append(w)
    out = listToString(filtered_sentence)
    return out

# 5. Preprocess Tweets


def pre_process_file(username):
    tweetFile = pd.read_csv('data/'+username+".csv")
    tweets = tweetFile['tweet'].tolist()
    tweetFile['clean_tweet'] = [filter_stop_words(
        i) for i in [clean_text(x) for x in tweets]]
    tweetFile.to_csv('data/'+username+".csv")


# run tests
if __name__ == "__main__":
    username = sys.argv[1]
    tweetcount = sys.argv[2]

    print("cleaning tweets<br/>")
    pre_process_file(username)
