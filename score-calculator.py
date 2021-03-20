def calc_score(num_ppl: int, avg_dist: float):
  if num_ppl <= 1: return 5
  min_avg = num_ppl ** 2.0 / 4000.0 + 6.0
  if num_ppl > 30: min_avg *= 1.1
  return max(min((avg_dist / min_avg) * 10.0 - 5.0, 5.0), 0.0)
  
