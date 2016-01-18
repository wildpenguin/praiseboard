# PraiseBoard python version
# compares users performance based on input data (number of ticket, number of calls )
# Author : wildpenguin@gmail.com

import operator

class PraiseBoard:

	def __init__(self, data=None):
		self._data = data

	def setData(self, data):
		self._data = data

	def build_stats(self):
		if not self._data:
			return {}
		first_rank = self.get_first_rank()
		return self.rank_data(first_rank)

	def get_first_rank(self):
		if self._data:
			return max(self._data.iteritems(), key = operator.itemgetter(1))
		return None

	def rank_data(self, first_rank):
		if self._data:
			ranked = map(lambda (k,v): (k, round(float(v)/first_rank[1], 2)), self._data.iteritems())
			return sorted(ranked, key=operator.itemgetter(1), reverse=True)
		return None

	