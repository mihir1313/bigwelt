<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogPostsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Top 5 PHP Frameworks to Boost Your Development',
                'content'    => 'Choosing the right framework can significantly enhance your productivity as a PHP developer. In this post, we’ll explore the top five PHP frameworks, including Laravel, Symfony, CodeIgniter, Yii, and CakePHP, 
                                discussing their strengths and ideal use cases.',
                'author_id'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Best Practices for Writing Clean PHP Code',
                'content'    => 'Writing clean and maintainable code is crucial for any developer.
                 This post outlines best practices such as adhering to PSR standards, utilizing meaningful variable names, 
                 and employing design patterns to create scalable and easy-to-read PHP applications.',
                'author_id'  => 2,
                'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using the Query Builder to insert data
        $this->db->table('blog_posts')->insertBatch($data);
    }
}
