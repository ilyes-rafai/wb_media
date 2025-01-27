import Layout from "@/Layouts/Layout";
import { Head, Link } from "@inertiajs/react";
import Spacer from "./Guest/Components/Spacer";
import Hero from "./Guest/Sections/Hero";
import Pricing from "./Guest/Sections/Pricing";
import Topics from "./Guest/Sections/Topics";
import Word from "./Guest/Sections/Word";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <Layout>
            <Head title="Welcome" />

            <Hero />
            <Spacer />

            <Topics />
            <Spacer />

            <Pricing />
            <Spacer />

            <Word />
            <Spacer />
        </Layout>
    );
}
