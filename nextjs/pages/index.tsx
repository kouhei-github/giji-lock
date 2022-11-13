import {NextPage} from "next";
import Layout from "../layout/layout";
import Circle from "../components/Circle";

/**
 * レイアウトの切り替え
 * 参考: https://imatomix.com/imatomix/notes/1591872503000
 */
export const getServerSideProps = async () => ({
    props: {
        layout: "layout" // 複数のレイアウトを切り替えたいときは 'MainLayout' などの文字列を用いる
    }
})

const Home: NextPage = () => {
    return (
        <div className={""}>HOME</div>
    )
}
export default Home
