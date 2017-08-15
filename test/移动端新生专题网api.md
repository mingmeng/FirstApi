

# 移动端新生专题网api

api地址http://www.yangruixin.com/test/apiRatio.php(网校的服务器还没有拿到手,暂时先用我个人的服务器做测试)

返回格式：json

请求方式：post

返回参数说明:

Status:状态码,参考http状态码,200为获取成功.

Info:返回状态说明,当获取成功时,返回'success',失败时返回'error'

Version:api版本号,用来说明当前api 

Data:所返回的数据,具体说明如下:

## 重邮数据

#### 1.男女比例

请求参数说明：

| 名称          | 类型     | 必填   | 说明                |
| ----------- | ------ | ---- | ----------------- |
| RequestType | string | 是    | 请求男女比例填“SexRatio” |

json返回示例:

`{"college":"\u5168\u6821","MenRatio":"0.66471399035148","WomenRatio":"0.33528600964852"}`

返回参数说明:

college参数:为学院名或全校,该参数会返回的值为

		'通信与信息工程学院',
		'光电工程学院',
		'经济管理学院',
		'计算机科学与技术学院',
		'外国语学院',
		'生物信息学院',
		'网络空间安全与信息法学院',
		'自动化学院',
		'先进制造工程学院',
		'体育学院',
		'理学院',
		'传媒艺术学院',
		'软件工程学院',
		'国际半导体学院',
		'国际学院',
		'全校'
MenRatio:为男生所占的比例,返回为小数格式,请自行对其进行处理

WomenRatio:女生所占的比例,说明同上.

### 2.最难科目

请求参数说明：

| 名称          | 类型     | 必填   | 说明                |
| ----------- | ------ | ---- | ----------------- |
| RequestType | string | 是    | 请求挂科率填“FailRatio“ |

json返回示例:`{"course":"\u5927\u5b66\u82f1\u8bed","ratio":"0.5","college":"\u901a\u4fe1\u4e0e\u4fe1\u606f\u5de5\u7a0b\u5b66\u9662","major":"\u901a\u4fe1\u4e0e\u4fe1\u606f\u7c7b"}`

参数说明:

course:课程名

ratio:挂科率,以小数形式返回

college:学院名

major:专业名





### 3.就业率

请求参数说明:

| 名称          | 类型     | 必填   | 说明                 |
| ----------- | ------ | ---- | ------------------ |
| RequestType | string | 是    | 请求就业率填写"WorkRatio" |

返回参数说明:

该参数为直接返回所有学院数据

格式为"学院:就业率",例如:"通信与信息工程学院:0.9231"

json返回示例:

`"\u751f\u7269\u4fe1\u606f\u5b66\u9662":0.9724,"\u4f20\u5a92\u827a\u672f\u5b66\u9662":0.9647,"\u5148\u8fdb\u5236\u9020\u5de5\u7a0b\u5b66\u9662":0.9661,"\u8ba1\u7b97\u673a\u79d1\u5b66\u4e0e\u6280\u672f\u5b66\u9662":0.9613,"\u7406\u5b66\u9662":0.9593,"\u4f53\u80b2\u5b66\u9662":0.9559,"\u5149\u7535\u5de5\u7a0b\u5b66\u9662\/\u91cd\u5e86\u56fd\u9645\u534a\u5bfc\u4f53\u5b66\u9662":0.9553,"\u8f6f\u4ef6\u5de5\u7a0b\u5b66\u9662":0.9371,"\u7ecf\u6d4e\u7ba1\u7406\u5b66\u9662":0.9231,"\u901a\u4fe1\u4e0e\u4fe1\u606f\u5de5\u7a0b\u5b66\u9662":0.9231,"\u81ea\u52a8\u5316\u5b66\u9662":0.9104,"\u5916\u56fd\u8bed\u5b66\u9662":0.8611,"\u6cd5\u5b66\u9662":0.7222`

## 邮子攻略

#### 请求方式:get

#### 请求地址:http://www.yangruixin.com/test/apiForGuide.php(仍然是先用自己的测试...网校的有点杂我不是很好管理...)





#### 1.校园环境

请求参数说明:

| 名称          | 类型     | 必填   | 说明                  |
| ----------- | ------ | ---- | ------------------- |
| RequestType | string | 是    | 填写"SchoolBuildings" |

返回格式说明:

```sql lite
		{"title": "鸟瞰重邮",
        "content": "站在腾飞广场，做着属于我们的腾飞梦，从这一刻便开启了你的大学新篇章。秉持“修德、博学、求实、创新”校训，书写你的重邮梦。很高兴能与你在重邮相遇。",
        "url": [
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xyhj/鸟瞰重邮.png"
        ]}
```
title:图片名

content:图片介绍

url:图片地址

#### 2.学生寝室

请求参数说明:

| 名称          | 类型     | 必填   | 说明            |
| ----------- | ------ | ---- | ------------- |
| RequestType | string | 是    | 填写"Dormitory" |

返回格式说明:

```sql lite
		{
            "name": "明理苑（24—31,39）",
            "resume": "位于千喜鹤食堂正街上，可以俯瞰全校以及南山的部分美丽景色，这里也是重邮夏天最凉爽的地方。可以坐私家车直达寝室，周围有两个超市和上铺，并且校车穿过，每个寝室都为6人间，并设有独立卫生间，每一栋楼里面配置有洗衣机可供大家使用，应有尽有，可以尽情满足同学们的平日生活需求。",
            "url": [
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xsqs/明理苑 (1).JPG",
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xsqs/明理苑 (2).JPG",
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xsqs/明理苑 (3).JPG",
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xsqs/明理苑 (4).JPG"
            ]
        }
```

name:寝室名

resume:寝室介绍

url:寝室图片地址

#### 3.学生食堂

请求参数说明:

| 名称          | 类型     | 必填   | 说明          |
| ----------- | ------ | ---- | ----------- |
| RequestType | string | 是    | 填写"Canteen" |

返回格式说明:

```sql lite
		{
            "name": "中心食堂",
            "resume": "地理位置的优越不仅来源于它历史的悠久，更是因为中心特色小面的支持，这里一砖一瓦都沉淀着岁月的气息。又大又好吃又便宜的素菜包子和肉花卷、馒头加豆浆，是早餐的不二选择。",
            "url": [
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_xsst/中心食堂.jpg"
            ]
        }
```

name:食堂名

resume:食堂介绍

url:图片地址

#### 4.入学须知

该部分文本太多怕写坏....这部分麻烦你们写在本地...

#### 5.QQ群

请求参数说明:

| 名称          | 类型     | 必填   | 说明          |
| ----------- | ------ | ---- | ----------- |
| RequestType | string | 是    | 填写"QQGroup" |

返回格式说明:

该接口返回的为两个数组,其中homeland键值指代的是老乡群,college键值指代的是学院新生群

```json
        {
         	"GroupName": "通信与信息工程学院",
            "Number": "498167991"
        }
```
其中GroupName代表群名

Number代表群号

搜索请自行在本地实现...

#### 6.日常生活

请求参数说明:

| 名称          | 类型     | 必填   | 说明             |
| ----------- | ------ | ---- | -------------- |
| RequestType | string | 是    | 填写"LifeInNear" |

返回格式说明:

```json
        {
            "name": "ZAKKA生活小铺",
            "location": "重庆邮电大学旁，新校门出门，左转直走，老校门出门，右转直走",
            "resume": "\r\n文具等用品齐全",
            "url": [
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_rcsh/ZAKKA生活小铺.jpg"
            ]
        }
```

name:商铺名

location:地址

resume:简介

url:图片链接

#### 7.周边美食

请求参数说明:

| 名称          | 类型     | 必填   | 说明       |
| ----------- | ------ | ---- | -------- |
| RequestType | string | 是    | 填写"Cate" |

返回格式说明:

```json
        {
            "name": "李记串串",
            "location": "永辉超市旁边",
            "resume": "口味独特，麻辣鲜香",
            "url": [
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_zbms/李记串串.jpg"
            ]
        }
```

name:商铺名

location:地址

resume:简介

url:图片链接

#### 8.周边美景

请求参数说明:

| 名称          | 类型     | 必填   | 说明               |
| ----------- | ------ | ---- | ---------------- |
| RequestType | string | 是    | 填写"BeautyInNear" |

返回格式说明:

```json
        {
            "name": "大金鹰",
            "location": " 重庆市南岸区南山路25路大金鹰园内",
            "resume": "数十里景物尽收眼底",
            "url": [
                "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/yzgl_zbmj/大金鹰.jpg"
            ]
        }
```

name:景点名

location:地址

resume:简介

url:图片链接

## 重邮风采

请求方式:get

请求地址:http://yangruixin.com/test/apiForText.php(测试地址...说明同上)

#### 1.学生组织

请求参数说明:

| 名称          | 类型     | 必填   | 说明                |
| ----------- | ------ | ---- | ----------------- |
| RequestType | string | 是    | 填写"organizations" |

返回格式说明:

```json
        {
            "name": "重庆邮电大学团委各部室",
            "resume": "",
            "department": [
                {
                    "name": "团委办公室",
                    "resume": "负责协调和承办团委的日常事务；负责团委大型会议的会务工作；团委相关工作的上传与下达；负责奖状、文件的保管工作；协助管理团委资产。"
                },
                {
                    "name": "团委组织部",
                    "resume": "负责团的基层组织建设工作；开展推优入党工作；负责开展青年马克思主义者培养工程； 指导主题团日活动的开展；开展五四评优表彰工作。"
                },
                {
                    "name": "团委宣传部",
                    "resume": "负责团属刊物的制作；负责团委官方微博、微信等新媒体阵地的建设；负责myouth平台的建设管理；负责校内各项活动的采访、拍摄及相关专题视频的制作。"
                }
            ]
        }
```

name:组织名

resume:简介

department:下辖部门=>name:部门名

​					resume:部门介绍

#### 2.原创重邮

请求参数说明:

| 名称          | 类型     | 必填   | 说明              |
| ----------- | ------ | ---- | --------------- |
| RequestType | string | 是    | 填写"natureCQUPT" |

返回格式说明:

```json
		{
            "name": "看见重邮",
            "url": "http://v.youku.com/v_show/id_XNzExODM3Njk2.html?from=y1.2-1-95.3.12-2.1-1-1-11-0"
        }
```

name:视频名

url:视频链接

#### 3.美在重邮

请求参数说明:

| 名称          | 类型     | 必填   | 说明                |
| ----------- | ------ | ---- | ----------------- |
| RequestType | string | 是    | 填写"beautyInCQUPT" |

返回格式说明:

```json
		{
            "title": "春日落樱",
            "content": "樱花烂漫红陌上，花开花落皆是景\r\n春风暖，吹绿了重邮，朵朵樱花饱吮着雨露的滋润，与绿叶相衬，在春风的轻抚中缓缓舒展。让我们一起漫步在三月的重邮，去欣赏那些美丽的存在。\r\n",
            "url": "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/cyfc_mzcy/spring.PNG"
        }
```

title:图片

content:图片描述

url:图片链接

#### 4.优秀教师

请求参数说明:

| 名称          | 类型     | 必填   | 说明                |
| ----------- | ------ | ---- | ----------------- |
| RequestType | string | 是    | 填写"excellentTech" |

返回格式说明:

```json
		{
            "name": "彭语良",
            "url": "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/cyfc_yxjs/9.彭语良.jpg"
        }
```

name:教师名

url:图片链接

#### 5.优秀学生

请求参数说明:

| 名称          | 类型     | 必填   | 说明               |
| ----------- | ------ | ---- | ---------------- |
| RequestType | string | 是    | 填写"excellentStu" |

返回格式说明:

```json
		{
            "name": "丛广林",
            "resume": "重邮小帮手背后的技术好能手，用创意传递团思党意；红岩网校里辛勤的代码探索者，用产品激活青春正能量。用原创游戏贴近同学，建专题网站打造主流，带技能培训熔炼团队，抓宣传跟帖清朗网络。他就是将实践服务融入网络的社会主义核心价值观传播者。",
            "url": "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/cyfc_yxxs/1/1.JPG",
            "motto": "e路有你，书写无悔青春"
        }
```

name:学生名

resume:简介

url:图片链接

motto:座右铭

## 军训特辑

### 军训贴士

文本过于复杂怕写错...麻烦你们自己写一下...

### 军训风采

请求方式:get

请求地址:http://yangruixin.com/test/apiForGuide.php(测试地址...说明同上)

#### 1.军训视频

请求参数说明:

| 名称          | 类型     | 必填   | 说明                        |
| ----------- | ------ | ---- | ------------------------- |
| RequestType | string | 是    | 填写"MilitaryTrainingVideo" |

返回格式说明:

```json
{
            "title": "重庆邮电大学2016级学生军训回顾",
            "url": "https://v.qq.com/x/page/f0526oi2zyx.html",
            "cover": "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/cover/重庆邮电大学2016级学生军训回顾.png"
        }
```

title:视频名

url:视频链接

cover:图片链接

#### 2.军训图片

请求参数说明:

| 名称          | 类型     | 必填   | 说明                        |
| ----------- | ------ | ---- | ------------------------- |
| RequestType | string | 是    | 填写"MilitaryTrainingPhoto" |

返回格式说明:

```json
{
        "title": [
            "重邮军魂",
            "整齐划一",
            "拉练活动",
            "拨挡冲拳",
            "射击训练",
            "分列式风采"
        ],
        "url": [
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/1.重邮军魂.jpg",
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/2.整齐划一.jpg",
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/3.拉练活动.jpg",
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/4.拨挡冲拳.jpg",
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/5.射击训练.jpg",
            "http://hongyan.cqupt.edu.cn/welcome/2017/photoForWelcome/jxfc/6.分列式风采.jpg"
        ]
    }
```

title数组:图片名

url:图片链接

#### 3.军歌推荐

这部分有些杂乱,麻烦存本地...