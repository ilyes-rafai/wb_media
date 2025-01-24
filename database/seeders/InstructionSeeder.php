<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Instruction::create([
            'title' => 'HTML structure',
            'description' => 'Basic structure with a <ul> for navigation links and a <div> for the burger menu.',
            'code' => '<!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Responsive Navbar</title>
                                <link rel="stylesheet" href="styles.css">
                            </head>
                            <body>

                                <nav class="navbar">
                                    <div class="logo">MySite</div>
                                    <ul class="nav-links">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                    <div class="burger">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </nav>

                                <script src="script.js"></script>
                            </body>
                            </html>',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        Instruction::create([
            'title' => 'CSS styles',
            'description' => '
                - Uses Flexbox for layout.
                - Hides the menu on mobile and shows it with .nav-active.
                - Smooth transitions for a better user experience.
                ',
            'code' => '
                /* Reset */
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                /* Navbar */
                .navbar {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background: #333;
                    color: white;
                    padding: 15px 20px;
                    position: fixed;
                    width: 100%;
                    top: 0;
                    left: 0;
                    z-index: 1000;
                }

                /* Logo */
                .logo {
                    font-size: 1.5rem;
                    font-weight: bold;
                }

                /* Navigation links */
                .nav-links {
                    list-style: none;
                    display: flex;
                }

                .nav-links li {
                    margin: 0 15px;
                }

                .nav-links a {
                    color: white;
                    text-decoration: none;
                    font-size: 1.2rem;
                }

                /* Burger Menu */
                .burger {
                    display: none;
                    cursor: pointer;
                }

                .burger .line {
                    width: 30px;
                    height: 3px;
                    background: white;
                    margin: 5px;
                }

                /* Responsive */
                @media screen and (max-width: 768px) {
                    .nav-links {
                        position: absolute;
                        top: 60px;
                        left: 0;
                        width: 100%;
                        background: #333;
                        flex-direction: column;
                        align-items: center;
                        display: none;
                    }

                    .nav-links li {
                        margin: 15px 0;
                    }

                    .burger {
                        display: block;
                    }
                }

                /* Active Class */
                .nav-active {
                    display: flex !important;
                }
            ',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        Instruction::create([
            'title' => 'JavaScript',
            'description' => 'Adds/removes the .nav-active class when the burger menu is clicked.',
            'code' => '
            document.addEventListener("DOMContentLoaded", () => {
                const burger = document.querySelector(".burger");
                const nav = document.querySelector(".nav-links");

                burger.addEventListener("click", () => {
                    nav.classList.toggle("nav-active");
                });
            });
            ',
            'user_id' => 1,
            'project_id' => 1,
        ]);
    }
}
