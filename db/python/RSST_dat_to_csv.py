import pickle, pandas as pd, csv

pd.set_option('display.max_rows', 1000)
pd.set_option('display.max_columns', 10000)
pd.set_option('display.width', 10000)

dat = pd.read_pickle('RSST_dat.pickle')

#https://brohrer.github.io/dataframe_indexing.html
#print(dat)
#print(dat.head())
#print(dat.describe())
#print(dat.columns)
#cols = dat.index
#print(cols)

thetamin = dat.loc['thetamin'].values
thetamax = dat.loc['thetamax'].values
p1 = dat.loc['P1'].values
p2 = dat.loc['P2'].values
p3 = dat.loc['P3'].values
p4 = dat.loc['P4'].values
p5 = dat.loc['P5'].values
p6 = dat.loc['P6'].values
m1 = dat.loc['M1'].values
m2 = dat.loc['M2'].values
m3 = dat.loc['M3'].values

csv_file = 'terrain_type,band,polarization,thetamin,thetamax,p1,p2,p3,p4,p5,p6,m1,m2,m3\n'
count = 0
for col in dat.columns:
    csv_file += col[0] + ',' + col[1] + ',' + col[2] + ',' + str(thetamin[count]) + ',' + str(thetamax[count]) + ',' + str(p1[count]) + ',' + str(p2[count]) + ',' + str(p3[count]) + ',' + str(p4[count]) + ',' + str(p5[count]) + ',' + str(p6[count]) + ',' + str(m1[count]) + ',' + str(m2[count]) + ',' + str(m3[count]) + '\n'
    count += 1

print(csv_file)