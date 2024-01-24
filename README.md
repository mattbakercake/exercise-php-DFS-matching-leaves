# Leaf-Similar Trees

Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.

Two binary trees are considered leaf-similar if their leaf value sequence is the same.

Return true if and only if the two given trees with head nodes root1 and root2 are leaf-similar.

## Solution

This problem requires a Depth First Search (DFS) solution to recurse through binary tree branches from root to leaf working left to right.  Two approaches are detailed:
* recursive function (`RecursiveSolution.php`)
* iterative function (`IterativeSolution.php`)

While the recursive funtion is a bit more concise and easier to read, the iterative function will have better performance in PHP.

## Run Tests

* run composer install to make sure PHPUnit is installed
* run `./vendor/bin/phpunit tests/RecursiveSolutionTest.php --display-warnings` from project directory
* run `./vendor/bin/phpunit tests/IterativeSolutionTest.php --display-warnings` from project directory

## Example
<image src="images/leaf-similar-1.jpg" width="500"/>

Output would be true