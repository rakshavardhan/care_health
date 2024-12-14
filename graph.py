import sqlite3
import pandas as pd
import folium


conn = sqlite3.connect('health_metrics.db') 


query = """ 
SELECT name, latitude, longitude, heartRate, calories, sugarLevel 
FROM daily_reports;
"""


df = pd.read_sql_query(query, conn)


conn.close()


center_lat = df['latitude'].mean()
center_lon = df['longitude'].mean()


map = folium.Map(location=[center_lat, center_lon], zoom_start=12)


for index, row in df.iterrows():
    popup_info = (
        f"<b>Name:</b> {row['name']}<br>"
        f"<b>Heart Rate:</b> {row['heartRate']} bpm<br>"
        f"<b>Calories Burnt:</b> {row['calories']}<br>"
        f"<b>Sugar Level:</b> {row['sugarLevel']} mg/dL"
    )
    folium.Marker(
        location=[row['latitude'], row['longitude']],
        popup=popup_info,
        icon=folium.Icon(color='blue', icon='info-sign')
    ).add_to(map)


map.save("graph.html")

print("Map has been created and saved as 'graph.html'.")