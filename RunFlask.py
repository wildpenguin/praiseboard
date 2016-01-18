# Run the backend part of the flask framework
# and send the praiseboard ranks to the browser
# author: wildpenguin@gmail.com

from flask import Flask, jsonify
from PraiseBoard import PraiseBoard

app = Flask(__name__)

@app.route('/stats')
def stats():
	data = {'tom':334, 'bob':210, 'mary':421, 'kim':142}
	praiseboard = PraiseBoard(data)
	ranking = praiseboard.build_stats()
	print ranking
	return jsonify(ranking)

if __name__ == '__main__':
	app.run(debug=True)

	