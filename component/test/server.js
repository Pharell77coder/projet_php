const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const port = 8080;

app.use(bodyParser.json());

const dbPath = path.resolve(__dirname, '../db/data.db');
const db = new sqlite3.Database(dbPath, (err) => {
  if (err) {
    console.error('Error opening database', err);
  } else {
    db.run('CREATE TABLE IF NOT EXISTS test_matches (id INTEGER PRIMARY KEY, content TEXT)', (err) => {
      if (err) {
        console.error('Error creating table', err);
      }
    });
  }
});

app.post('/saveMatch', (req, res) => {
  const { content } = req.body;
  db.run('INSERT INTO test_matches (content) VALUES (?)', [content], function(err) {
    if (err) {
      res.status(500).send('Error saving match');
      console.error(err.message);
    } else {
      res.status(200).send('Match saved successfully');
    }
  });
});

app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
