<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - IUB Library</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-[url('bgImage.jpg')] bg-center bg-cover">

    <div class="flex-1">
        
        <?php include "includes/borrowNav.php"; include "includes/route.php";?>
    </div>

    <div class="mx-auto overflow-y-auto bg-blue-50 p-10 rounded-md shadow-md w-3/4" style="opacity: 0.9;">
        <h1 class="text-4xl font-bold mb-6">About BookNest</h1>
        <section>
            <h2 class="text-2xl font-bold mb-4">Background</h2>
            <p class="text-lg mb-4">
                IUB Library started its journey in 1992, within the confines of a single room in a rented house at Banani, Dhaka, graciously furnished with a donation of 160 volumes of books from Dr. A Majeed Khan, the esteemed founder President and President Emeritus of Independent University, Bangladesh (IUB).
                As our commitment to fostering learning and discovery grew stronger, so did our physical space. In just a year, we expanded to a larger room at House number 8, Road 10, Baridhara, Dhaka, setting the stage for a journey of growth and transformation. The year 1998 marked yet another significant step, as we moved to two floors of a rented house on Baridhara’s Road 14, House number 5, creating more room for exploration and engagement.
                Anticipating the needs of our university community, we continued to evolve. This hub of knowledge acquisition became a beacon of academic pursuit, offering three floors of resources before finding its home on the university's permanent campus.
                The transition from Baridhara to our university's permanent campus at Bashundhara brought with it another expansion. In 2010, a new chapter began as we relocated to the heart of the university at Bashundhara. Today, the IUB Library proudly occupies four meticulously designed floors within the western section of the campus, seamlessly integrated between the university's academic and administrative blocks. This strategic positioning reinforces our commitment to easy accessibility for all seekers of knowledge.
            </p>
        </section>
        <section>
            <h2 class="text-2xl font-bold mb-4">Mission</h2>
            <p class="text-lg mb-4">
                The library's mission is to provide a range of services to inspire intellectual discovery and support learning, teaching, and research of the University with access to extensive materials and resources, available in both physical and digital spaces.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">Vision</h2>
            <p class="text-lg mb-4">
                To strengthen the library's role to support research, teaching and learning, providing access to world-class knowledge resources using innovative technologies of the 21st century
                With a great team of dedicated, professional staff, available virtually or on-campus, the library encourages scholarly communication, reflection, dissemination and use of information in a flexible and supportive learning environment

            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">Resources</h2>
            <p class="text-lg mb-4">
                Our shelves bear witness to a diverse and extensive collection of printed works, a testament to our dedication to curating resources that cater to myriad academic interests. But our commitment doesn't stop there. In an era where the digital realm shapes scholarly exploration, we have curated an array of electronic resources from world-renowned publishers and aggregators. Through collaborations with two esteemed consortia — the UGC Digital Library (UDL) by the University Grants Commission (UGC) and the Library Consortium of Bangladesh (LiCoB) under the Bangladesh Academy of Sciences — we extend our reach to the digital frontier.
                Independently, we have also advanced subscriptions to vital platforms like ProQuest’s ABI Global, EBSCOhost’s eBooks Academic Collection, Manupatra, National Geographic, and Literary Encyclopedia, enriching our collection with diverse perspectives and insights.
                Behind every page turned and every digital resource accessed stands our dedicated team of library staff members. Their commitment, knowledge, and innovation empower our university stakeholders to discover and harness the boundless potential of information.

                The library subscribes to two major online electronic resources through the University Grants Commission Digital Library (UDL) and Bangladesh Academy of Sciences under the Library Consortium of Bangladesh (LiCoB), besides notable academic databases such as ProQuest-ABI Global Info, EBSCOhost eBooks Academic Collection, BDLex and Research4Life to support institutional research capacity.

            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">Join Us</h2>
            <p class="text-lg mb-4">
                Join us on this journey, as we invite you to explore the IUB Library — a sanctuary of knowledge, an oasis of
                exploration, and a gateway to academic excellence.
            </p>
        </section>

    </div>


    <?php include "includes/borrowFooter.php"; ?>


    <script>
        document.getElementById("booksDropdownBtn").addEventListener("click", function() {
            var dropdown = document.getElementById("booksDropdown");
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", function(event) {
            var dropdown = document.getElementById("booksDropdown");
            var dropdownBtn = document.getElementById("booksDropdownBtn");

            if (!dropdown.contains(event.target) && !dropdownBtn.contains(event.target)) {
                dropdown.classList.add("hidden");
            }
        });
    </script>

</body>

</html>