import pandas as pd 
path = 'app/tools/lib.csv'

class Main:
    def word(word):
        a = ''
        df = pd.read_csv(path)
        a = df[df['意味'].str.contains(word)]
        if a.empty :
            return '見つかりません'
        b = a.iloc[0,1]
        return b
