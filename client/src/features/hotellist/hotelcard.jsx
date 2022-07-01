import { Box, Button, Container, Image, Text } from '@chakra-ui/react';
import { Link } from 'react-router-dom';
import React, { useState } from 'react';
import {AiFillStar} from 'react-icons/ai';
const HotelCard = (item) => {

  const randomStar = () => {
    return  Math.floor(Math.random()*6)+1;  
  }

  const resRandom = randomStar();
 

  return (
      <Box
        px={'15px'}
        w={'full'}
        mb="20px"        
      >
        <Box      
          overflow={'hidden'}
          rounded={'5px'}
          display={'flex'}
          flexDir={'column'}
          textAlign={'start'}
          border={'1px solid #888780'}
          cursor={'pointer'}
          _hover={{
            boxShadow: 'rgba(0, 0, 0, 0.35) 0px 5px 15px',
            transform: 'translateY(-1%)',
            transition: 'all 0.1s linear',
          }}
        >
          <Box>
            <Image maxW={'full'} src='https://holidaybeachdanang.com/wp-content/uploads/2018/04/President-Suite-Beachfront-Bedroom-4.jpg'></Image>
          </Box>
          <Box pt={'10px'} px={'16px'} minH={'80px'}>
            <Text color={"var(--text-color)"} fontWeight={"500"} fontSize={"18px"}>
              Khách sạn Mường Thanh
            </Text>          
            <Text color={'#e8604c'}>12000 VNĐ</Text>           
          </Box>
          <Box px={'16px'} display={'flex'}>
              <Box color={resRandom > 0 ? "#FFCD38" : "unset"}>
                <AiFillStar/>
              </Box>
              <Box color={resRandom > 1 ? "#FFCD38" : "unset"}>
                <AiFillStar/>
              </Box>
              <Box color={resRandom > 2 ? "#FFCD38" : "unset"}>
                <AiFillStar/>
              </Box>
              <Box color={resRandom > 3 ? "#FFCD38" : "unset"}>
                <AiFillStar/>
              </Box>
              <Box color={resRandom > 4 ? "#FFCD38" : "unset"}>
                <AiFillStar/>
              </Box>
          </Box>
          {/* {`/tourDetail/${item.slug}`} */}
          <Link to="">
            <Box py={'10px'} px={'16px'}>
              <Box maxWidth={"150px"} 
                        px={"30px"} 
                        py={"8px"} 
                        bgColor='var(--button-color)'
                        color={"blackAlpha.900"} 
                        cursor={"pointer"}        
                        _hover={
                          {
                            backgroundColor: "var(--hover-color)",

                          }
                        }>Xem chi tiết</Box>
            </Box>
          </Link>
        </Box>
      </Box>
  );
};

export default HotelCard;
