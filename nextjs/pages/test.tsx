import {NextPage} from "next";
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

const test: NextPage = () => {
    return (
        <div className={"relative"}>
            <Circle />
            <div className={"absolute top-[360px] right-[370px] animate-spin"}>TEST</div>
        </div>
    )
}

export default test;
