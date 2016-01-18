import unittest
from PraiseBoard import PraiseBoard

class PraiseBoardTest(unittest.TestCase):

	def test_empty_input(self):
		praise_board =  PraiseBoard()
		praise_board.setData({})
		self.assertEqual({}, praise_board.build_stats())

	def test_first_rank(self):
		praise_board = PraiseBoard({'mary':23, 'john':100, 'tobby':56})
		most_ranked = praise_board.get_first_rank()
		self.assertEquals(('john', 100), most_ranked)

		

	def test_build_stats(self):
		praise_board = PraiseBoard({'mary':20, 'john':100, 'tobby':10})
		stats = praise_board.build_stats()
		self.assertEquals(stats, [('john',1.0), ('mary',0.2), ('tobby',0.1)])

if __name__ == '__main__':
	unittest.main()
