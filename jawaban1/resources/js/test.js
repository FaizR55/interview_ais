
const DATA = [ 1 , -1 ,  3 , -4 ,  5 , -2 ,  7 ,  4 ,  2 ];

const arry = DATA.map( v => Math.floor( Math.abs(v) * 100) / 100 );

$array = (arry.sort((a, b) => a - b));

const RETURN = (arr) => {
  let sorted_arr = arr.slice().sort();
  let results = [];
  for (let i = 0; i < sorted_arr.length - 1; i++) {
    if (sorted_arr[i + 1] == sorted_arr[i]) {
      results.push(sorted_arr[i]);
    }
  }
  return results;
}

console.log(RETURN($array));
