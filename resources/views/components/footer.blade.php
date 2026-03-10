<footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300 "
    x-data="{ currentYear: new Date().getFullYear() }">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Company</h3>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">About
                            Us</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Careers</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Resources -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Resources</h3>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Documentation</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Support</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Blog</a>
                    </li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Legal</h3>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Privacy
                            Policy</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Terms
                            of Service</a></li>
                    <li><a href="#"
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Cookies</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter Signup -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Newsletter</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Subscribe to get the latest updates and articles.
                </p>
                <form class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" id="email" placeholder="Your email"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-12 pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4 rtl:space-x-reverse text-gray-600 dark:text-gray-300 text-sm">
                    <span>© <span x-text="currentYear"></span> Blog. All rights reserved.</span>
                </div>

                <div class="flex space-x-4 rtl:space-x-reverse text-gray-600 dark:text-gray-300">
                    <a href="#" aria-label="LinkedIn"
                        class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                    <!-- Add more social icons here -->
                </div>
            </div>
        </div>
    </div>
</footer>
