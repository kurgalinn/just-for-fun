# just-for-fun
 Different funny tasks

## Tasks
- [Route of snake](#snake-route)


### Route of snake<a name="snake-route"></a>
[[solution](https://github.com/kurgalinn/just-for-fun/blob/master/tasks/Snake.php)]

Condition: _rendering array in a spiral, the size of array M * N_
```php
(new Snake(4, 5))->renderRoute();

(new Snake(7, 5))->renderRoute();
```
Output:
```
   1   2   3   4
  14  15  16   5
  13  20  17   6
  12  19  18   7
  11  10   9   8
  
   1   2   3   4   5   6   7
  20  21  22  23  24  25   8
  19  32  33  34  35  26   9
  18  31  30  29  28  27  10
  17  16  15  14  13  12  11
```
