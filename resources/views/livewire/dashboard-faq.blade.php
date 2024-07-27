<main x-data="{qopen: false, success:false}" class="bg-white mt-5 rounded-md h-[fit] lg:w-[700px] flex flex-start flex-col .container px-2">
            <header class="flex gap-2 .text-gray-600 text-sky-500 font-semibold items-center py-4 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-question">
                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/>
                </svg>
                <h2 class="text-xl border-r-2 border-sky-400 pr-4">Frequently Asked Questions</h2> 
                <button @click="qopen = true; success= false" href="#" class="flex gap-2 font-normal items-center text-sm text-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                 Ask a question
                </button>
            </header>
            <hr>
            <div x-show="success" class="px-6 py-5">
                <h3 class="text-green-500 text-lg">
                    Successfully asked question!
                </h3>
                <p class="text-gray-700 text-sm">The support team will answer the question and make it available</p>
            </div>
            <div x-show="qopen">
                <livewire:faq-form />
            </div>

            <section class="my-6"> 
                <dl class="px-6">
                    <dt class="text-sky-500 text-lg">How do I send money to another user? </dt>
                    <dd class="text-gray-600 mb-10"> To send money to another user, log in to your account, navigate to the "Send Money" or "Transfer" section, enter the recipient's details including their account number or email address, specify the amount you want to send, and confirm the transaction. </dd>

                    <dt class="text-sky-500 text-lg"> What payment methods are accepted for adding funds to my account? </dt>
                    <dd class="text-gray-600 mb-10"> We accept various payment methods including bank transfers, credit/debit cards, and third-party payment platforms such as Momo. You can choose the most convenient option for you. </dd>

                     <dt class="text-sky-500 text-lg">What should I do if I encounter an issue with my account or transaction? </dt>
                    <dd class="text-gray-600"> If you encounter any issues with your account or transactions, please contact our customer support team immediately. They are available to assist you with any questions or concerns you may have. </dd>
                </dl>
            </section>
        </main>