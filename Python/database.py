# Python script to handle database interactions for CRUD operations
# This script provides functions to connect to a MySQL database and perform basic CRUD operations.
# Ensure you have the mysql-connector-python package installed
# You can install it using pip: pip install mysql-connector-python

import mysql.connector

def connect_db(host, user, password, database):
    return mysql.connector.connect(
        host=host,
        user=user,
        password=password,
        database=database
    )

def add_record(conn, table, data):
    placeholders = ', '.join(['%s'] * len(data))
    columns = ', '.join(data.keys())
    sql = f"INSERT INTO {table} ({columns}) VALUES ({placeholders})"
    cursor = conn.cursor()
    cursor.execute(sql, list(data.values()))
    conn.commit()
    cursor.close()

def edit_record(conn, table, data, where_clause, where_params):
    set_clause = ', '.join([f"{col}=%s" for col in data.keys()])
    sql = f"UPDATE {table} SET {set_clause} WHERE {where_clause}"
    cursor = conn.cursor()
    cursor.execute(sql, list(data.values()) + where_params)
    conn.commit()
    cursor.close()

def delete_record(conn, table, where_clause, where_params):
    sql = f"DELETE FROM {table} WHERE {where_clause}"
    cursor = conn.cursor()
    cursor.execute(sql, where_params)
    conn.commit()
    cursor.close()

# Example usage:
# conn = connect_db('localhost', 'username', 'password', 'database')
# add_record(conn, 'users', {'name': 'Alice', 'email': 'alice@example.com'})
# edit_record(conn, 'users', {'email': 'alice@newdomain.com'}, 'name=%s', ['Alice'])
# delete_record(conn, 'users', 'name=%s', ['Alice'])
# conn.close()