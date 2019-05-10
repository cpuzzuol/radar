import pickle, pandas as pd, csv

pd.set_option('display.max_rows', 1000)
pd.set_option('display.max_columns', 10000)
pd.set_option('display.width', 10000)

his = pd.read_pickle('RSST_his.pickle')

#print(zero)

#https://brohrer.github.io/dataframe_indexing.html
#print(his)
#print(his.head())
#print(his.describe())
#print(his.columns)

a_0 = his.loc[0.0].values
a_5 = his.loc[5.0].values
a_10 = his.loc[10.0].values
a_15 = his.loc[15.0].values
a_20 = his.loc[20.0].values
a_25 = his.loc[25.0].values
a_30 = his.loc[30.0].values
a_35 = his.loc[35.0].values
a_40 = his.loc[40.0].values
a_45 = his.loc[45.0].values
a_50 = his.loc[50.0].values
a_55 = his.loc[55.0].values
a_60 = his.loc[60.0].values
a_65 = his.loc[65.0].values
a_70 = his.loc[70.0].values
a_75 = his.loc[75.0].values
a_80 = his.loc[80.0].values

csv_file = 'terrain_type,band,polarization,statistic,a_0,a_5,a_10,a_15,a_20,a_25,a_30,a_35,a_40,a_45,a_50,a_55,a_60,a_65,a_70,a_75,a_80\n'
count = 0
for col in his.columns:
    if col[3] != 'countData':
        csv_file += col[0] + ',' + col[1] + ',' + col[2] + ',' + col[3] + ',' + str(a_0[count]) + ',' + str(a_5[count]) + ',' + str(a_10[count]) + ',' + str(a_15[count]) + ',' + str(a_20[count]) + ',' + str(a_25[count]) + ',' + str(a_30[count]) + ',' + str(a_35[count]) + ',' + str(a_40[count]) + ',' + str(a_45[count]) + ',' + str(a_50[count]) + ',' + str(a_55[count]) + ',' + str(a_60[count]) + ',' + str(a_65[count]) + ',' + str(a_70[count]) + ',' + str(a_75[count]) + ',' + str(a_80[count]) + '\n'
    count += 1

print(csv_file)