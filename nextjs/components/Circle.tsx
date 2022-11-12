import {NextPage} from "next";


const Circle: NextPage = () => {
    return (
        <div className={"relate"}>
            <div className={"absolute top-[130px] right-[150px] w-[500px] h-[500px] rounded-full border border-[#ff00ff] animate-ping duration-800"} />
            <div className={"absolute top-[30px] right-[50px]  w-[700px] h-[700px] rounded-full border border-[#dcdcdc] animate-pulse duration-500"} />
        </div>
    )
}
export default Circle

