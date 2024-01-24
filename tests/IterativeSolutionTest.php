<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../IterativeSolution.php"; //simple exercise - include solution class

class IterativeSolutionTest extends TestCase
{
    #[DataProvider('matchingTreeProvider')]
    #[DataProvider('nonMatchingTreeProvider')]
    public function testDepthTraverseNodessMatches($match, $root1, $root2): void
    {
        $solution = new IterativeSolution;

        $solution->depthTraverseNodes($root1[1], 'root1Leaves');
        $solution->depthTraverseNodes($root2[1], 'root2Leaves');

        $this->assertSame($root1[0], $solution->root1Leaves);
        $this->assertSame($root2[0], $solution->root2Leaves);
    }

    /**
     * Tests TreeNode leaf match against expected result
     */
    #[DataProvider('matchingTreeProvider')]
    #[DataProvider('nonMatchingTreeProvider')]
    public function testMatchingLeaves($match, $root1, $root2): void
    {
        $solution = new IterativeSolution;

        $result = $solution->matchingLeaves($root1[1], $root2[1]);

        $this->assertSame($match, $result);
    }

    /**
     * Data provider supplying testcase TreeNode objects and expected test outcome
     */
    public static function matchingTreeProvider(): array
    {
        return [
            'matching leaves' => [
                true,
                [
                    [6, 7, 4, 9, 8],
                    new TreeNode(
                        val: 3,
                        left: new TreeNode(
                            val: 5,
                            left: new TreeNode(
                                val: 6,
                                left: null,
                                right: null
                            ),

                            right: new TreeNode(
                                val: 2,
                                left: new TreeNode(
                                    val: 7,
                                    left: null,
                                    right: null,
                                ),

                                right: new TreeNode(
                                    val: 4,
                                    left: null,
                                    right: null,
                                )

                            )

                        ),

                        right: new TreeNode(
                            val: 1,
                            left: new TreeNode(
                                val: 9,
                                left: null,
                                right: null,
                            ),

                            right: new TreeNode(
                                val: 8,
                                left: null,
                                right: null,
                            )

                        )
                    ),
                ],
                [
                    [6, 7, 4, 9, 8],
                    new TreeNode(
                        val: 3,
                        left: new TreeNode(
                            val: 5,
                            left: new TreeNode(
                                val: 6,
                                left: null,
                                right: null,
                            ),

                            right: new TreeNode(
                                val: 7,
                                left: null,
                                right: null,
                            )

                        ),

                        right: new TreeNode(
                            val: 1,
                            left: new TreeNode(
                                val: 4,
                                left: null,
                                right: null,
                            ),

                            right: new TreeNode(
                                val: 2,
                                left: new TreeNode(
                                    val: 9,
                                    left: null,
                                    right: null,
                                ),

                                right: new TreeNode(
                                    val: 8,
                                    left: null,
                                    right: null,
                                )

                            )

                        )

                    )

                ]
            ]
        ];
    }
    public static function nonMatchingTreeProvider(): array
    {
        return [
            'non-matching leaves' =>  [
                false,
                [
                    [2, 3],
                    new TreeNode(
                        val: 1,
                        left: new TreeNode(
                            val: 2,
                            left: null,
                            right: null
                        ),

                        right: new TreeNode(
                            val: 3,
                            left: null,
                            right: null,
                        )

                    ),
                ],
                [
                    [3, 2],
                    new TreeNode(
                        val: 1,
                        left: new TreeNode(
                            val: 3,
                            left: null,
                            right: null,
                        ),

                        right: new TreeNode(
                            val: 2,
                            left: null,
                            right: null,
                        )

                    )
                ]
            ]
        ];
    }
}
